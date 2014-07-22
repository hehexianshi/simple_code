<?php    
// 进程数数
$s = 3;
$pidFile = '/path/pcntl.pid';

if(isset($argv[1]) && $argv[1] == 'stop') {
    $tid = file_get_contents($pidFile);
    posix_kill($tid, SIGKILL);
    exit;
}

$pid = pcntl_fork();
if($pid == -1) {

} else if($pid) {
    file_put_contents($pidFile, $pid);
}else{
    while(true){
        $cid = pcntl_fork();
        if($cid == -1) {

        } else if($cid) {
            static $num = 0;
            $num++;
            if($num >= $s) {
                pcntl_wait($status);
                $num--;
            }
        } else {
            // 正常业务
            sleep(3);
            exit;
        }
    }
}

