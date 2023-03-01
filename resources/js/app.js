import './bootstrap';

import Alpine from 'alpinejs';

import getDistanceQuestions from './distance/questions';

import adminAttendanceUserUpdate from './admin/attendance/user/update';

window.Alpine = Alpine;

Alpine.data('getDistanceQuestions',getDistanceQuestions);

Alpine.data('adminAttendanceUserUpdate',adminAttendanceUserUpdate);

Alpine.start();
