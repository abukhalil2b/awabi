import "./bootstrap";

import Alpine from "alpinejs";

import adminAttendanceUserUpdate from "./admin/attendance/user/update";

window.Alpine = Alpine;

Alpine.data("adminAttendanceUserUpdate", adminAttendanceUserUpdate);


Alpine.start();
