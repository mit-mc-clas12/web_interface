import subprocess
import datetime

currentDT = datetime.datetime.now()

a=subprocess.Popen("/site/scicomp/auger-slurm/bin/slurmHosts",stdout=subprocess.PIPE)
b= a.communicate()[0]
available=0
total=0
for i, content in enumerate(b.split()):
	if i<6:
		continue
	if i%6==2:
		state=content
	if i%6==4:
		if (state=="MIXED" or state=="IDLE" or state=="ALLOCATED"):
			available=available+int(content.split('/')[0])
		total=total+int(content.split('/')[0])

file = open(r"Sample_script_result_jlab","w")
file.write("Updated on "+currentDT.strftime("%Y-%m-%d %H:%M:%S"))
file.write("\nTotal cores: "+total)
file.write("\nBusy cores: "+total-available)
file.write("\nIdle cores: "+available)
file.close()
