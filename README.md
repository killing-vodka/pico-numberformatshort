# Pico Number Format Short

A simple plugin for Pico to turn your value in an easy human readable number. Pico is a stupidly simple, blazing fast, flat file CMS. See https://picocms.org/ for more info.

To use PicoNumberFormatShort, simply use the `format_short` filter with your value inside your tpl, and your value will be shortened like 2.5K (two thousand five hundred) or 44M (forty-four million).

Some exemples:

- `{{ 157|format_short }}` returns 157
- `{{ 1000|format_short }}` returns 1K
- `{{ 1301|format_short }}` returns 1.3K+
- `{{ 11433|format_short }}` returns 11K+
- `{{ 22956789|format_short }}` returns 22M+

## Install

If you're using one of [Pico's pre-built release packages](https://github.com/picocms/Pico/releases/latest), you need to first create an empty `plugins/PicoNumberFormatShort` directory in Pico's installation directory on your server. Next, download the latest source package of `PicoNumberFormatShort` and upload `PicoNumberFormatShort.php` into the aforementioned `plugins/PicoNumberFormatShort` directory.

That's all.
