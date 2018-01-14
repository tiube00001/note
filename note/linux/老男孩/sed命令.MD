### linux sed

1.sed：stream editor，流编辑器，可以实现对文件的增删改查

    1.sed -n '$'p （sed -n '$p'，效果一样）filename：打印文件的最后一行
    2.-n，取消默认输出，（默认是输出文件的所有内容）
    3.p，打印
    4.sed 's#repalce#search#g' test.txt: 将文件test.txt的输出中的所有serach全局替换成replace，
       从左至右：s表示替换，#是分隔符，（自定义的，用其他符号也一样），repalce是目的，search是目标，g表示全局替换
       加上-i，会永久修改文件内容，不加只是修改输出
       