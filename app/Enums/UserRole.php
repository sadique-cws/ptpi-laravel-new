<?php

namespace App\Enums;

enum UserRole:string
{
    case teacher = "teacher";
    case admin = "admin";
    case recruiter = "recruiter";
    case examsetter = "examsetter";
}
