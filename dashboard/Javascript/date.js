//automatically fills the time period (still possible to change)
var d = new Date();
var month = d.getMonth() + 1;
var day = d.getDate();
var currentDate = d.getFullYear() + '-' + (month < 10 ? '0' : '') + month + '-' + (day < 10 ? '0' : '') + day;
var Tmonth = d.getMonth() + 2;
var terminationDate = d.getFullYear() + '-' + (Tmonth < 10 ? '0' : '') + Tmonth + '-' + (day < 10 ? '0' : '') + day;
$("#currentDate").val(currentDate);
$("#terminationDate").val(terminationDate);
