# Todo-List
Development of a Todo List Web App.

Todo List Report:

1: How to Run the Application:

To run the Todo List locally, please follow the steps below:

1. Clone the repository:
   Open your terminal and run the following command to clone the repository:
   
   ```bash
   git clone https://github.com/your-repository/todo-app.git
   cd todo-app
   ```

2. Install dependencies:
   The project uses Laravel as the backend and Tailwind CSS for styling. Run the following command to install all PHP and front-end dependencies:

   ```bash
   composer install    # For PHP dependencies
   npm install        # For JavaScript and front-end dependencies
   ```

3. Set up environment file:
   Copy the `.env.example` file to `.env`:

   ```bash
   cp .env.example .env
   ```

   In the `.env` file, make sure to set your database connection details, mail configurations (if needed), and any other necessary environment variables.

4. Generate application key:
   Run the following Artisan command to generate the application key:

   ```bash
   php artisan key:generate
   ```

5. Run database migrations:
   If this is the first time running the app, run the following command to set up the database schema:

   ```bash
   php artisan migrate
   ```

6. Run the application:
   Start the Laravel development server by running:

   ```bash
   php artisan serve
   ```

   The application will now be available at `http://127.0.0.1:8000`.

7. Run front-end build:
   If you're using Vue.js or React for components, build the front-end assets:

   ```bash
   npm run dev   # For local development
   npm run build # For production build
   ```

8. Access the Web App:
   Visit the Web app by going to `http://127.0.0.1:8000` in your browser.

2: Project Overview and Used Tools:

The Todo List is a task management application designed to help users manage their tasks efficiently. It provides users with functionalities to add, update, delete, and mark tasks as complete.

Used Tools and Technologies:

- Laravel: A PHP web application framework used for the backend. It provides an elegant syntax and built-in support for routing, authentication, database migrations, and more.
  
- Blade: Laravel’s templating engine, used for rendering dynamic views.
  
- Laravel Livewire: A full-stack framework for building dynamic interfaces without leaving the comfort of Laravel. Livewire makes it easy to add interactivity to your app without writing a lot of JavaScript.
  
- Tailwind CSS: A utility-first CSS framework used to style the frontend of the application, enabling responsive, flexible designs with minimal effort.

- MySQL: Used as the database management system to store user data, tasks, and other relevant information.

- Alpine.js: A minimal framework for adding interactivity to the front-end (used with Livewire for handling some client-side actions).

3: List of Features:

Below is a list of the key features of the Todo List:

1. User Registration and Authentication:
   - Allows users to create an account, log in, and manage their tasks.
   - Uses Laravel’s built-in authentication system (via Laravel Breeze).

2. Create, Edit, and Delete Tasks:
   - Users can add new tasks, edit existing ones, and remove tasks they no longer need.
   
3. Task Completion:
   - Tasks can be marked as "complete" or "incomplete", allowing users to easily track progress.

4. Task Filtering:
   - Users can filter tasks based on their completion status (e.g., "All", "Completed", "Incomplete").

5. Real-time Updates with Livewire:
   - Task updates (e.g., marking as completed, adding/editing tasks) are done in real-time without page reloads, using Laravel Livewire.

6. Responsive Design:
   - The app is fully responsive, meaning it adapts to mobile, tablet, and desktop screen sizes.
   - Tailwind CSS is used for easy responsive design implementation.

7. Database Persistence:
   - Tasks are stored in a MySQL database to persist user data across sessions.
   
8. User Profile and Dashboard:
   - Each user has a profile page where they can see their tasks and manage them.

9. Search Functionality:
   - Users can search tasks by title to quickly find a specific task.

10. Data Validation:
    - Laravel handles server-side validation for task input to ensure that only valid data is saved.

4: Database Diagram (ERD):

Here is the Entity-Relationship Diagram (ERD) for the Todo List database:

```
+----------------+      +----------------+      +-----------------+
|     Users     |      |     Tasks      |      | Task_Users      |
+----------------+      +----------------+      +-----------------+
| id             |<---->| id             |<---->| id              |
| name           |      | user_id        |      | user_id         |
| email          |      | title          |      | task_id         |
| password       |      | description    |      | created_at      |
| created_at     |      | due_date       |      | updated_at      |
| updated_at     |      | status         |      +-----------------+
+----------------+      | created_at     |
                        | updated_at     |
                        +----------------+
```

- Users: Stores the user data such as name, email, and password.
- Tasks: Contains task data like the task title, description, due date, and status (e.g., completed or pending).
- Task_Users: This table is a join table that relates users to their tasks (since each user can have multiple tasks, and each task belongs to a single user).

5: Additional Information:

- Development Tools:
  - Laravel Artisan is used for running commands such as migrations, route generation, and seeding.
  - Telescope is used for monitoring and debugging application requests and background jobs.
  - GitHub is used for version control and collaboration.

- Future Enhancements:
  - Task Prioritization: Add a feature to set task priorities (low, medium, high).
  - Due Date Reminders: Implement email or in-app notifications for tasks nearing their due date.
  - Task Categories: Allow users to organize tasks into different categories for better task management.
