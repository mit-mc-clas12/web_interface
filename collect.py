import subprocess
import datetime

currentDT = datetime.datetime.now()

text=subprocess.Popen(['ssh','t3desk000.mit.edu','~/farmnodes.sh'], stdout=subprocess.PIPE)
string=text.communicate()[0]
array=string.split(' ',2)

file = open(r"Sample_script_result","w")
file.write("Updated on "+currentDT.strftime("%Y-%m-%d %H:%M:%S"))
file.write("\nTotal nodes: "+array[0])
file.write("\nBusy nodes: "+array[1])
file.write("\nIdle nodes: "+array[2])
file.close()
