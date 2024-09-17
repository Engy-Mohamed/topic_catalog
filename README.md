# Topic Website

<p align="right"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="150" alt="Laravel Logo"></a></p>

## Overview

**Topic Website** is a Laravel-based platform designed for managing and displaying topics across various categories.

## Features

### User Authentication
- **Registration and Login** via `laravel/ui`.
- **Admin Authentication** with username and password for content management.
- Admin-created users are automatically set as active, and their email is marked as verified.

### Topic Management
- Full CRUD functionality for topics, managed through models and controllers.
- Soft delete is implemented for topics.

### Category Management
- Full CRUD functionality for categories.
- Categories can contain multiple topics.
- Categories with associated topics cannot be soft-deleted.
- Category names are unique if not deleted.

### Testimonial Management
- Full CRUD functionality for testimonials.
- Soft delete is implemented for testimonials.

### User Management
- Users can be created and updated through models and controllers.

### Message Management
- Admin dashboard shows unread/read private messages.
- Admin can read or soft delete messages.
- Messages are marked as read once viewed.

### Content Display
- **Homepage (Index)** shows:
  - Two most viewed published topics.
  - Latest three published testimonials.
  - Top 5 categories, each showing their latest three published topics.
  
- **Topics Listing Page**:
  - Displays all published topics, paginated.
  - Latest two trending published topics.
  
- **Client Testimonials Page**: Displays all published testimonials.

### Extra Features
- **Contact Us Page**: 
  - Customer messages are emailed (to MAIL_TO_CONTACTUS address in the `.env` file) and saved to the database.
  
- **Topic Details Page**: 
  - Includes a "Save" icon to increase view count.

### Pagination
- Pagination is implemented on the topics listing page (3 topics per page).

## Future Enhancements
- Topic search functionality by title or category.
- Rating and review system for topics.
- Additional admin reports and analytics.

## Dependencies
- Laravel 11.x
- PHP 8.2.12
- MySQL
- Bootstrap

## Getting Started

1. Clone or download the repository and run `composer install`.
2. Set your `.env` variables and generate the app key.
3. Migrate and seed the databases.
4. Registered users will need email verification and admin activation.
5. Admin-added users will be active by default and won’t need email verification.
6. Access Admin dashboard:
   - Admin dashboard: `/admin/messages`
   - Frontend: root URL, then register icon -> already have an account -> login -> enter credentials.
   - if you already logged in the rigister icon redirects you to admin dashboard.
   - Default admin credentials: 
     - **Username**: Admin 
     - **Password**: password
7. From the admin dashboard, access the homepage by clicking on the website icon.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Owner
- **Engy Refae**

