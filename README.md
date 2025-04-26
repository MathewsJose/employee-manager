# 📦 Employee Management API (CSV Batch Import)

A **Laravel 11** application implementing **Clean Architecture**, **Domain-Driven Design (DDD)**, **SOLID principles**, and **Design Patterns** for scalable, maintainable, and robust Employee management.

## ✨ Project Architecture & Concepts

* **Clean Architecture**: Clear separation of concerns (Presentation, Application, Domain, Infrastructure).
* **Domain-Driven Design (DDD)**: Core business logic isolated into Domain layer.
* **SOLID Principles**: Code is modular, loosely coupled, and easy to test.
* **Design Patterns Used**:
   * **Repository Pattern**: Decouple database operations from business logic.
   * **Service Layer Pattern**: Keep controller thin, business logic in Services.
   * **Job/Queue Pattern**: Handle large CSV imports asynchronously.
   * **Factory Pattern**: For entity creation if scaling is needed.
* **Event-driven**: Laravel Events and Jobs prepared for future scalability.
* **Validation Layer**: Form Requests separate input validation.

## 🏛 Project Structure

```
app/
├── Application/
│   └── Services/
│       └── EmployeeService.php  # Business logic
│
├── Domain/
│   └── Employee/
│       ├── Employee.php  # Entity
│       ├── EmployeeRepositoryInterface.php  # Interface
│
├── Infrastructure/│   
│       └── Repositories/
│           └── EmployeeRepository.php  # Concrete repository
│
├── Interfaces/
│   └── Http/
│       └── Controllers/
│           └── EmployeeController.php
│
database/
└── migrations/
    └── create_employees_table.php

routes/
└── api.php  # API Routes
```

## 📥 Installation & Setup

```bash
# Clone the repository
git clone https://github.com/yourname/employee-api.git
cd employee-api

# Install dependencies
composer install

# Copy .env
cp .env.example .env

# Configure .env
# Set DB_DATABASE, DB_USERNAME, DB_PASSWORD

# Run migrations
php artisan migrate

# Start Docker
docker-compose up -d

# Queue Worker
php artisan queue:work
```

## 🔥 API Endpoints

| Method | Endpoint | Description |
|--------|----------|-------------|
| POST | `/api/employee` | Upload and import CSV employees |
| GET | `/api/employee` | List all employees |
| GET | `/api/employee/{id}` | Get employee by ID |
| DELETE | `/api/employee/{id}` | Delete employee |

## 🚀 Importing CSV

Example `cURL` command to upload a large CSV file:

```bash
curl -X POST -H "Content-Type: text/csv" --data-binary @storage/app/imports/large_employee_data.csv http://localhost:8080/api/employee
```

**Important**:
* Place your `large_employee_data.csv` in `storage/app/imports/` folder.

## 🧹 Key Clean Code Practices

* **Single Responsibility Principle**: Each class and function does only one thing.
* **Dependency Injection**: No tight coupling, everything resolved via Laravel container.
* **No Fat Controllers**: Controllers are just orchestrators.
* **Service Layer**: Business logic extracted into Services.
* **Repository Interface**: Flexibility to swap databases (MySQL, PostgreSQL, etc.).
* **Command Bus**: Laravel Jobs used for batch processing.

## 🛠 Tech Stack

* PHP 8.4
* Laravel
* MariaDB
* Docker & Docker Compose

## 🧠 Improvements (If time allowed)

* Use **Domain Events** (`EmployeeCreated`, `EmployeeDeleted`) and listeners.
* Add **Swagger API Documentation**.
* Include **Bulk Export API** for employees.
* Add **Unit Tests** and **Feature Tests** (PHPUnit).

## 🎯 Conclusion

This project is a real-world example combining **Laravel**, **modern architectures**, and **design principles**. It ensures 