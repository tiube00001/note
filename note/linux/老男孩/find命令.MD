### find命令
    -type 文件类型，可取值：f-file，d-directory，c-charactre, b-block, s-socket，l-link，
    -name 文件名
    -mtime 修改时间，例如：
        -mtime 7：第七天
        -mtime +7：7天以前
        -mtime -7：最近7天
    ！：取反
    -a: 取交集（and）
    -o: 取并集（or）