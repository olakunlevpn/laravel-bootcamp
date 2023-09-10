import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import intersect from '@alpinejs/intersect'

Alpine.plugin(intersect)
