import.meta.glob([
  '../images/**',
  '../fonts/**',
]);

import BurgerMenu from "./burger-menu";
import 'lite-youtube-embed';
import 'lite-youtube-embed/src/lite-yt-embed.css';

const mobileMenu = new BurgerMenu();