<?php

namespace AN\Skeleton\Env;

enum CurentEnv: string implements Env
{
    case DEV = 'dev';
    case TEST = 'test';
    case PROD = 'prod';
}
