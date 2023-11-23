import os,time
def ct(file):
    return time.ctime(os.path.getctime(file))

print(ct("pdeptid (1).csv"))