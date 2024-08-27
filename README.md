# Customer Search Functionality in Laravel

## Overview

This Laravel project implements a customer search functionality that allows users to search for customers based on their email, order numbers, and item names. The search results are optimized using Eloquent relationships and query optimizations, adhering to SOLID, DRY, and KISS principles.

## Features

- **Customer Listing**: Display a list of customers with their associated orders and items.
- **Search Functionality**: Search customers based on email, order number, and item name.
- **Optimized Queries**: Use of Eloquent eager loading and selecting specific columns to optimize performance.
- **Pagination**: Handle large datasets efficiently by paginating the search results.
- **Responsive UI**: Simple UI using Bootstrap for styling.

## Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/yourusername/laravel-customer-search.git
   cd laravel-customer-search
   
2. **Install dependencies:**
    ```bash
    composer install
    ```

3. **Create a `.env` file:**
    ```bash
    cp .env.example .env
    ```
   Configure your database credentials in the `.env` file.

4. **Generate application key:**
    ```bash
    php artisan key:generate
    ```

5. **Run migrations:**
    ```bash
    php artisan migrate
    ```

6. **Seed the database with test data:**
    ```bash
    php artisan db:seed
    ```

7. **Start the development server:**
    ```bash
    php artisan serve
    ```

## Usage

- Access the application in your browser.
- Use the `/customers` URL to filter customers by email, order number, or item name.

## Approach

The search functionality is implemented by leveraging Laravel’s Eloquent ORM to handle relationships between customers, orders, and items. Eager loading is used to minimize database queries, and only the necessary columns are selected to optimize performance. The search filters are applied using `whereHas` and `where` clauses, ensuring that the queries remain efficient even with large datasets. Pagination is added to further improve the performance and user experience by breaking down the results into manageable pages.
