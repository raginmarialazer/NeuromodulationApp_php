# NeuromodulationApp_php
An application with simple form which can be filled in and depending on the  responses will then calculate a total score.
Initial commit test

Set up:
Root folder created : C:\Neuromodulation\NeuromodulationApp_php
Hosted in IIS , mapped under defaultapllicationpool (for settings refer: assets/image_iis.png)
in db created user ragin and given all permissions (included in script.sql)

URL for 1st form (NeuromodulaTon): http://localhost:{port#}/NeuromodulationForm.php
URL for 2nd form (Admin view) : http://localhost:{port#}/Admin.php

added into php.ini
extension=php_pdo_sqlsrv_83_nts_x64.dll
extension=php_sqlsrv_83_nts_x64.dll


DBScript: script for server version - SQL Server 2022

local variable values are stored in .env file (installed vlucas/phpdotenv for creating .env file)