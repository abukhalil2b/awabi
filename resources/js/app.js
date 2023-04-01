import './bootstrap';

import Alpine from 'alpinejs';

import getDistanceQuestions from './distance/questions';

import adminAttendanceUserUpdate from './admin/attendance/user/update';

import audienceSelectNumbers from './audience/select_numbers';

window.Alpine = Alpine;

Alpine.data('getDistanceQuestions',getDistanceQuestions);

Alpine.data('adminAttendanceUserUpdate',adminAttendanceUserUpdate);

Alpine.data('audienceSelectNumbers',audienceSelectNumbers);

Alpine.start();
