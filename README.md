# NeuromodulationApp_php
An application with simple form which can be filled in and depending on the  responses will then calculate a total score.
Initial commit test
 
Hosted in IIS , mapped under defaultapllicationpool
in db created user in default app pool and given permissions

URL for 1st form (NeuromodulaTon): http://localhost:{port#}/NeuromodulationForm.php
URL for 2nd form (Admin view) : http://localhost:{port#}/Admin.php

added into php.ini
extension=php_pdo_sqlsrv_83_nts_x64.dll
extension=php_sqlsrv_83_nts_x64.dll


DBScript: script for server version - SQL Server 2022

local variable values are stored in .env file (installed vlucas/phpdotenv for creating .env file)
