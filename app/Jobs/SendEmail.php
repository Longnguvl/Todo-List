<?php

public function handle()
{
    // Example: Send an email
    Mail::to($this->user)->send(new UserRegisteredEmail());
}
