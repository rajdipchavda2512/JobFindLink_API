"# JobFindLink API Documentation" | Set-Content project-report.md

"`n---`n" | Add-Content project-report.md

"`n# Project Information`n" | Add-Content project-report.md

Get-ChildItem | Add-Content project-report.md

"`n---`n" | Add-Content project-report.md

"`n# Laravel Routes`n" | Add-Content project-report.md

php artisan route:list | Out-File routes.txt
Get-Content routes.txt | Add-Content project-report.md

"`n---`n" | Add-Content project-report.md

"`n# Controllers`n" | Add-Content project-report.md

Get-ChildItem app\Http\Controllers -Recurse |
Select-Object FullName |
Format-Table -HideTableHeaders |
Out-String |
Add-Content project-report.md

"`n---`n" | Add-Content project-report.md

"`n# Models`n" | Add-Content project-report.md

Get-ChildItem app\Models -Recurse |
Select-Object Name |
Format-Table -HideTableHeaders |
Out-String |
Add-Content project-report.md

"`n---`n" | Add-Content project-report.md

"`n# Services`n" | Add-Content project-report.md

Get-ChildItem app\Services |
Select-Object Name |
Format-Table -HideTableHeaders |
Out-String |
Add-Content project-report.md

"`n---`n" | Add-Content project-report.md

"`n# Database Migrations`n" | Add-Content project-report.md

Get-ChildItem database\migrations |
Select-Object Name |
Format-Table -HideTableHeaders |
Out-String |
Add-Content project-report.md

"`n---`n" | Add-Content project-report.md

"`n# Seeders`n" | Add-Content project-report.md

Get-ChildItem database\seeders |
Select-Object Name |
Format-Table -HideTableHeaders |
Out-String |
Add-Content project-report.md

"`n---`n" | Add-Content project-report.md

"`n# Config Files`n" | Add-Content project-report.md

Get-ChildItem config |
Select-Object Name |
Format-Table -HideTableHeaders |
Out-String |
Add-Content project-report.md

"`n---`n" | Add-Content project-report.md

"`n# Folder Structure`n" | Add-Content project-report.md

tree /F | Out-File structure.txt
Get-Content structure.txt | Add-Content project-report.md

Write-Host ""
Write-Host "================================="
Write-Host "PROJECT DOCUMENTATION GENERATED"
Write-Host "================================="
Write-Host ""