import subprocess

text=subprocess.Popen(['ssh','t3desk000.mit.edu','~/farmnodes.sh'], stdout=subprocess.PIPE)
string=text.communicate()[0]
array=string.split(' ',2)

file = open(r"Sample_script_result","w")
file.write("Total nodes: "+array[0])
file.write("\nBusy nodes: "+array[1])
file.write("\nIdle nodes: "+array[2])
file.close()