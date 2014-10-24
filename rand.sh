#!/bin/bash
#随机取出任意文件行

file=$1
count=10
#echo $file
len=`cat $file|wc -l`

while [ $count -gt 0 ]
do
    rand=`expr $RANDOM % $len` 
    awk 'BEGIN{ d = "'`echo $rand`'";}{ if ( NR == d ) printf $0}' $file
    echo 
    count=`expr $count - 1`
done
