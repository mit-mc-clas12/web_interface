#!/usr/bin/bash

total_nodes=`condor_status -pool flock.opensciencegrid.org -af Activity| wc -l`
busy_nodes=`condor_status -pool flock.opensciencegrid.org -af Activity| grep Busy| wc -l`
echo $total_nodes       $busy_nodes     $((total_nodes-busy_nodes))