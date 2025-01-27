<?php

public function render($request, Throwable $exception)
{
    if (config('app.debug')) {
        return parent::render($request, $exception);
    }

    // Custom error pages for production
    if ($exception instanceof NotFoundHttpException) {
        return response()->view('errors.404', [], 404);
    }

    return response()->view('errors.general', [], 500);
}

public function report(Throwable $exception)
{
    if ($this->shouldReport($exception)) {
        // Send notification (via email or Slack)
        Notification::route('mail', 'admin@example.com')
                    ->notify(new CriticalErrorOccurred($exception));
    }

    parent::report($exception);
}

public function handle()
{
    $logFile = storage_path('logs/slow-query.log');
    $slowQueries = file_get_contents($logFile);

    if (substr_count($slowQueries, 'Query time') > 10) {
        // Send alert (e.g., email, Slack)
        Notification::route('mail', 'admin@example.com')
                    ->notify(new SlowQueryAlert());
    }
}

public function failed(Exception $exception)
{
    Log::error('Job failed', ['exception' => $exception]);
    // Handle the failure (e.g., notify admin, retry, etc.)
}
