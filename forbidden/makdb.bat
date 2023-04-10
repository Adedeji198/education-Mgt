@echo off
copy .\pristine\rai.db
sqlite3 kwara_affairs.db<.\rai_Structure.sql