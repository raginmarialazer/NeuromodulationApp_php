# NeuromodulationApp_php
An application with simple form which can be filled in and depending on the  responses will then calculate a total score.
Initial commit test

Set up:
Root folder created : C:\Neuromodulation\
Clone to this folder path : URL:  https://github.com/raginmarialazer/NeuromodulationApp_php.git

Hosted in IIS , mapped under defaultapllicationpool (for settings refer: assets/image_iis.png)
setup DB with script.sql
in db created user ragin and given all permissions (included in script.sql)

URL for 1st form (NeuromodulaTon): http://localhost:{port#}/NeuromodulationForm.php (Create)
URL for 2nd form (Admin view) : http://localhost:{port#}/Admin.php (Read)

clicking on a row in Adminview opens the form in a read-only view where the admin can
see the patient’s responses and there options for Update and Delete


added into php.ini
extension=php_pdo_sqlsrv_83_nts_x64.dll
extension=php_sqlsrv_83_nts_x64.dll

local variable values are stored in .env file (installed vlucas/phpdotenv for creating .env file)

Demo screen record : assets\NeuromodulationAppDemo.mp4