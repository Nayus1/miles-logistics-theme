# Miles Logistics WordPress Theme

Hand-coded theme for the Miles Logistics website (HTML, CSS, JavaScript, PHP). No page builder, no theme framework.

## Install (LocalWP)
1. Put this folder in `Local Sites/<site>/app/public/wp-content/themes/miles-logistics-theme/`.
2. WP Admin: Appearance > Themes > activate **Miles Logistics**.
3. Open any WP Admin page once. The theme creates the pages (Home, About Us, Contact Us, the four services, Privacy Policy), sets the static front page and `/%postname%/` permalinks.

## Where things live
| What | File |
|---|---|
| Phone, email, address, social links, form key, map | `inc/data.php` > `site` |
| Navigation and footer links | `inc/data.php` > `nav`, `footer` |
| Service page text | `inc/data.php` > `services` |
| FAQs, industries, enquiry types | `inc/data.php` |
| Brand colours and fonts | `assets/css/base.css` (`:root`) |
| Home / About / Contact layouts | `front-page.php`, `page-about-us.php`, `page-contact-us.php` |
| Shared service layout | `template-parts/service-page.php` |

## Contact form
Forms post to [Web3Forms](https://web3forms.com). Create a free access key and paste it into `inc/data.php` (`form_key`). The key is designed to be public.

## Images
Optimised WebP files in `assets/img/` named `{name}-{width}.webp`. `miles_img()` builds the responsive `<img>` automatically. Keep the original large photos out of this repo.

## Static export (Vercel)
Export with Simply Static using relative paths, then push the export folder to the website repo.
