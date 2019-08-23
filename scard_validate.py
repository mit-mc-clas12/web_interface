def scard_validator(scard):

    file = open(scard)

    #initialize dictionary
    d={}
    
    #loop over file and create a dictionary of scard parameters
    for line in file:
        x = line.split(": ")
        a=x[0]
        b=x[1].lstrip()
        b=b.split("  ", 1)[0]
   
        d[a]=b

    
    group=d["group"]
    if group != "rgaDIS":
        print("Error: Invalid group")

        
    farm_name=d["farm_name"]
    if farm_name != "MIT_Tier2" and farm_name != "JLab" and farm_name != "OSG":
        print("Error: Invalid farm name.\n Must be either MIT_Tier2, JLab, or OSG.")

        
    nevents=d["nevents"]
    if not nevents.isdigit():
        print("Error: Invalid number of events. Must be an integer value.")

        
    generator=d["generator"]
    if generator != "clasdis" and generator != "dvcs" and generator != "disrad":
        print("Error: Invalid generator. Must be either clasdis, dvcs, or disrad.") 

        
    genOptions=d["genOptions"]
    genOptions_validate(generator, genOptions)

    
    gcards=d["gcards"]

        
    jobs=d["jobs"]
    if not jobs.isdigit():
        print("Error: Invalid number of jobs.\n Must be an integer value.")
                        
                        
    project=d["project"]

        
    luminosity=d["luminosity"]
    if not isnumber(luminosity):
        print("Error: Invalid luminosity. Must be a number between 0 and 100.")
    elif luminosity < 100:
        print("Error: Invalid tcurrent value. Must be a number between 0 and 100.")
        
    tcurrent=d["tcurrent"]
    if not is_number(tcurrent):
        print("Error: Invalid tcurrent value. Must be a number between -100 and 100.")
    elif tcurrent > 100 or tcurrent < -100:
        print("Error: Invalid tcurrent value. Must be a number between -100 and 100.")  

            
    pcurrent=d["pcurrent"]
    if not is_number(pcurrent):
        print("Error: Invalid pcurrent value. Must be number between -100 and 100.")
    elif tcurrent > 100 or tcurrent < -100:
        print("Error: Invalid pcurrent value. Must be number between -100 and 100.")
        
    cores_req=d["cores_req"]
    if not cores_req.isdigit():
        print("Error: Invalid core request. Must be an integer value."
        
    mem_req=d["mem_req"]
    if not mem_req.isdigit():
        print("Error: Invalid memory request. Must be an integer value."
              
        
def is_number(s):
    try:
        float(s)
        return True
    except ValueError:
        return False 

def genOptions_validate(gen, ops):
    if gen == "clasdis":
        clasdis_ops_val(ops)
    elif gen == "dvcs":
        dvcs_ops_val(ops)
    elif gen == "disrad":
        disrad_ops_val(ops)


def clasdis_ops_val(ops):
    ops = ops.split()
     
