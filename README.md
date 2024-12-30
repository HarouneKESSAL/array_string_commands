# Laravel Array and String Commands

This project contains two Laravel artisan commands:

1. **run:array_sum**: Calculates the sum of an array, including nested arrays.
    - Example: `php artisan run:array_sum '[1,2,[3,4,[5,6,[5]]]]'` outputs `26`.

2. **run:string_replace**: Replaces placeholders in a template string with provided arguments.
    - Example: `php artisan run:string_replace '{1}_{0}' hello world` outputs `world_hello`.

## How to Run

1. Clone this repository:
   ```bash
   git clone https://github.com/votre_nom_utilisateur/laravel-array-string-commands.git
    ```
2. Install dependencies:
    ```bash
    composer install
    ```
3. Run the commands:
    ```bash
    php artisan run:array_sum '[1,2,[3,4,[5,6,[5]]]]'
    php artisan run:string_replace '{1}_{0}' hello world
    ```
