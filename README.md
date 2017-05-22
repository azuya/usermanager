# MikroTik RouterOS Hotspot User Manager
adalah aplikasi berbasis web yang digunakan untuk mengatur user dan profile hotspot pada **MikroTik RouterOS**, aplikasi ini menggunakan API MikroTik **PEAR2 NetRouterOS** yang direkomendasikan oleh MikroTik.

## System Requirement
- PHP5
- MySql

## Fitur
### 1. Multi Admin
setiap admin mengelola 1 router
### 2. Auto Delete User
user yang sudah expired akan dihapus secara otomatis dari Router, menggunakan cron-job.

## Note
beberapa hostingan tidak mengizinkan membuka port selain **80** dan **443** sehingga perlu mengubah **PORT** pada file **/system/settings.php**.
