# Laravel 12 + Inertia.js 2 Starter Kit
A robust, production-ready starter kit featuring Laravel 12, Inertia.js 2, and Vue.js 3, styled with the TailAdmin dashboard template. This kit includes a pre-configured Role-Based Access Control (RBAC) system to jumpstart your application development.

# 🚀 Features
+ **Core:** Laravel 12 & Vue.js 3 (Composition API).

+ **Frontend:** Inertia.js 2 (The "Classic Monolith" feel with SPA power).

+ **Styling:** TailAdmin (Tailwind CSS based dashboard).

+ # RBAC (Role-Based Access Control):

    + **Admin:** Full access to the management suite.

    + **User:** Standard access to personal dashboard features.

+ # Authentication Suite:

    + Secure Login & Registration.

    + Robust "Forgot Password" workflow.

+ # User Settings:

    + Profile information management.

    + Secure Password change functionality.

# 🛠️ Installation
Follow these steps to get your local development environment active.

# 1. Clone the repository

git clone https://github.com/gauravsharmass/Laravel-12-Inertiajs-2-Vuejs-3-TailAdmin-StarterKit

cd Laravel-12-Inertiajs-2-Vuejs-3-TailAdmin-StarterKit

# 2. Install Dependencies
   # Install PHP dependencies
composer install

# Install Frontend dependencies
npm install

# 3. Environment Setup
   cp .env.example .env
   
php artisan key:generate

# Note: Update your .env file with your database credentials.

# 4. Database & Seeding
This project includes seeders to set up your RBAC roles and initial users.

php artisan migrate --seed

# 5. Compile Assets & Run
   # Compile assets
npm run dev

# Start the server
php artisan serve

# 6. Run the tests
   php artisan test

# 🔑 Default Credentials
Once seeded, you can log in with the following admin account:


| Role | Email | Password |
| -------- | -------- | -------- |
| Admin | admin@example.com  | password  |
| User| user@example.com | password |



# 📁 Project Structure
+ resources/js/Pages: Contains Vue 3 pages organized by role.

+ app/Http/Middleware: Contains the RBAC logic to redirect users based on roles.

+ routes/web.php: Defined routes for Authentication and Dashboard access.

# 🛠️ Tech Stack
**Backend:** Laravel 12

**Adapter:** Inertia.js 2

**Frontend:** Vue.js 3

**UI Template:** TailAdmin

**CSS:** Tailwind CSS

# 📄 License
The MIT License (MIT). Please see License File for more information.
