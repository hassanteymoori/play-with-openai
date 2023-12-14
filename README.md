#             

<div align="center">
<h1 align="center">Twin-GPT with Laravel and PHP</h1>
<h3 align="center">A minimal project to play with OpenAI api. </h3>

![version](https://img.shields.io/badge/version-0.0.1-blue)
[![tests](https://github.com/hassanteymoori/twin-gpt/actions/workflows/laravel.yml/badge.svg)](https://github.com/hassanteymoori/twin-gpt/actions/workflows/laravel.yml)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

</div>

## Getting Started

These instructions will help you set up and run the project on your local machine.

### Prerequisites

- PHP >= 7.4
- Composer
- Laravel >= 8

### Installation

1. Clone the repository:

    ```bash
    https://github.com/hassanteymoori/twin-gpt
    ```

2. Navigate to the project directory:

    ```bash
    cd twin-gpt
    ```

3. Install dependencies:

    ```bash
    composer install
    ```

4. Create a copy of the `.env.example` file and rename it to `.env`. Update the database and other relevant
   configurations.

    ```bash
    cp .env.example .env
    ```

5. Generate an application key:

    ```bash
    php artisan key:generate
    ```

6. Execute the install command:

    ```bash
    php artisan openai:install
    ```
   This will create a `config/openai.php` configuration file in your project, which you can modify to your needs using
   environment variables. Blank environment variables for the OpenAI API key and organization id are already appended to
   your `.env` file.

    ```bash
    OPENAI_API_KEY=sk-...
    OPENAI_ORGANIZATION=org-...
    ```

7. Serve the application:

    ```bash
    php artisan serve
    ```
   The application should now be accessible at [http://localhost:8000](http://localhost:8000).


8. Run the chat through cmd:

    ```bash
    php artisan chat
    ```

## Usage

// TODO

## Configuration

// To be added

## Contributing

// TODO

## License

This project is licensed under the [MIT License](LICENSE.md).

## Acknowledgments

- 
