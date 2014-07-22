# -*- coding: <encoding utf-8> -*-
from Queue import Queue
import linecache
import thread
import time

def timer(no, queue):
    while True:
        print linecache.getline('/usr/local/nginx/logs/access.log', queue.get())

def main():
    queue = Queue()
    c = 0
    while c < 569611:
        queue.put(c)
        c += 1

    starttime = time.time()
    thread.start_new_thread(timer, (1, queue))  
    thread.start_new_thread(timer, (2, queue))
    thread.start_new_thread(timer, (3, queue))
    while True:
        try:
            time.sleep(1)
        except KeyboardInterrupt:
            print (time.time() - starttime)
            break;

if __name__ == '__main__':
    main()
