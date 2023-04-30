# Wow Images technical assesment SPA built with Vue.js, Laravel, and Tailwind CSS

## Introduction

This is a Single Page Application (SPA) built with Vue.js, Laravel, and Tailwind CSS. It is a simple application that allows users view, wow, and comment on a NASA Image of the day.

## Technologies Used

- [Vue.js](https://vuejs.org/)
- [Laravel](https://laravel.com/)
- [Tailwind CSS](https://tailwindcss.com/)
- [Axios](https://github.com/axios/axios)

## Installation

1. Clone this repository: `git clone git@github.com:nbranning/wow-images.git`
2. `cd` into the project directory: `cd wow-images`
3. Install dependencies: `composer install` and `npm install`
4. Create a `.env` file: `cp .env.example .env` and update your database credentials
5. Generate an application key: `php artisan key:generate`
6. Generate an NASA api key at (https://api.nasa.gov/) and update the "NASA_API_KEY" in the .env file
7. Update the vite.config.js file for your host environment, lines 8, and 11.
8. Run database migrations: `php artisan migrate`
9. Build the application: `npm run dev`
10. Start the development server: `php artisan serve`



## Features

- Users can view the Astronomy Picture of the Day provided by NASA
- A user can like or unlike an image.
- A user can comment on a image after they like the image

## Future Improvements

- This is a technical assememnt so most likely no future improvements likely.

## Credits

This application was created by Nate Branning (https://github.com/nbranning).

## License

This project is licensed under the [MIT License](https://opensource.org/licenses/MIT).
Feel free to customize and modify the above example to fit your needs.