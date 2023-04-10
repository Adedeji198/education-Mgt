@echo off
del  .\pristine\rai.db
del rai.db
sqlite3<rai_emptyDB.sql
sqlite3 rai.db<.\rai_Structure.sql
copy  rai.db .\pristine