<?php

//ftp类

class FtpServer extends ServerBase {

    /**
     * 打开并登录服务器
     * 
     * @param string $flag 服务器标识test
     * @return mixed 
     *       0：服务器连接失败
     *       1：服务器登录失败
     *       resource 连接标识
     */
    public static function params() {
        return array(
            'host' => HOST,
            'port' => 21,
            'user' => HOST_USERNAME,
            'pwd' => HOST_PASSWORD
        );
    }

    public static function openServer($flag = 'test') {
        //选择服务器 
        $config = self::getServerConfig($flag);

        //连接服务器 
        $connect = ftp_connect($config['host'], $config['port']);
        if ($connect == false)
            return 0;

        //登录服务器 
        if (!ftp_login($connect, $config['user'], $config['pwd']))
            return 1;

        //打开被动模式，数据的传送由客户机启动，而不是由服务器开始 
        ftp_pasv($connect, true);

        //返回连接标识 
        return $connect;
    }

    /**
     * 创建目录并将目录定位到当请目录
     * 
     * @param resource $connect 连接标识
     * @param string $dirPath 目录路径
     * @return mixed 
     *       2：创建目录失败
     *       true：创建目录成功
     */
    public static function makeDir($connect, $dirPath) {
        //处理目录 
        $dirPath = '/' . trim($dirPath, '/');
        $dirPath = explode('/', $dirPath);
        foreach ($dirPath as $dir) {
            if ($dir == '')
                $dir = '/';
            //判断目录是否存在 
            if (@ftp_chdir($connect, $dir) == false) {
                //判断目录是否创建成功 
                if (@ftp_mkDir($connect, $dir) == false) {
                    return 2;
                }
                @ftp_chdir($connect, $dir);
            }
        }
        return true;
    }

    /**
     * 关闭服务器
     * 
     * @param resource $connect 连接标识
     */
    public static function closeServer($connect) {
        if (!empty($connect))
            ftp_close($connect);
    }

    /**
     * 上传文件
     * 
     * @param string $flag 服务器标识
     * @param string $local 上传文件的本地路径
     * @param string $remote 上传文件的远程路径
     * @return int 
     *       0：服务器连接失败 
     *       1：服务器登录失败
     *       2：创建目录失败
     *       3：上传文件失败
     *       4：上传成功
     */
    public static function upload($flag = 'test', $local, $remote) {
        //连接并登录服务器 
        $connect = self::openServer($flag);
        if (($connect === 0) || ($connect === 1))
            return $connect;

        //上传文件目录处理 
        $mdr = self::makeDir($connect, dirname($remote));
        if ($mdr === 2)
            return 2;

        //上传文件 
        $result = ftp_put($connect, basename($remote), $local, FTP_BINARY);

        //关闭服务器 
        self::closeServer($connect);

        //返回结果 
        return (!$result) ? 3 : 4;
    }

    /**
     * 删除文件
     * 
     * @param string $flag 服务器标识
     * @param string $remote 文件的远程路径
     * @return int 
     *       0：服务器连接失败 
     *       1：服务器登录失败
     *       2：删除失败
     *       3：删除成功
     */
    public static function delete($flag = 'test', $remote) {
        //连接并登录服务器 
        $connect = self::openServer($flag);
        if (($connect === 0) || ($connect === 1))
            return $connect;

        //删除 
        $result = ftp_delete($connect, $remote);

        //关闭服务器 
        self::closeServer($connect);

        //返回结果 
        return (!$result) ? 2 : 3;
    }

    /**
     * 读取文件
     * 
     * @param string $flag 服务器标识
     * @param string $remote 文件的远程路径
     * @return mixed 
     *       0：服务器连接失败 
     *       1：服务器登录失败
     */
    public static function read($flag, $remote) {
        //连接并登录服务器 
        $connect = self::openServer($flag);
        if (($connect === 0) || ($connect === 1))
            return $connect;

        //读取 
        $result = ftp_nlist($connect, $remote);

        //关闭服务器 
        self::closeServer($connect);

        //返回结果 
        foreach ($result as $key => $value) {
            if (in_array($value, array('.', '..')))
                unset($result[$key]);
        }
        return array_values($result);
    }

    /**
     * 获取ftp服务器配置
     * 
     * @param string $flag 服务器标识test
     * @return array ftp服务器连接配置
     */
    public static function getServerConfig($flag = 'test') {
        $flag = strtolower($flag);
        //测试服务器 
        if ($flag == 'test')
            return self::params();
        //默认返回测试服务器 
        return self::params();
    }

}
