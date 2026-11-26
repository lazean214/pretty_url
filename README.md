# pretty_url

A small PHP demo of "pretty" (clean) URLs. An Apache `mod_rewrite` rule sends every request that is not a real file or directory to `index.php`, where a tiny `Routes` class reads the URL as segments and a class autoloader loads classes on demand. The page uses the current URL segment to switch its heading — the base URL shows "Nice URL", and a path such as `/sample` shows the alternate view. Licensed under GPL-3.0.

## How it works

- `.htaccess` — enables `RewriteEngine` and rewrites any path that is not an existing file or directory to `index.php`.
- `core/autoloader.php` — registers an `spl_autoload_register` handler that includes `class.<ClassName>.php` when a class is first used.
- `core/class.Routes.php` — `base_url()` returns the application base path; `segment($n)` splits `$_SERVER['REQUEST_URI']` on `/` and returns the nth part.
- `index.php` — requires the autoloader, creates a `Routes` object, and renders a Bootstrap 3 navbar plus a content area that reacts to `segment(2)`.

## Setup

Place the folder in an Apache web root with `mod_rewrite` enabled and `AllowOverride All` set for that directory. The base path is hard-coded as `http://localhost/_niceurl/` in `core/class.Routes.php`; change it if the project is served from a different location.

## Links

- Repository: https://github.com/lazean214/pretty_url
