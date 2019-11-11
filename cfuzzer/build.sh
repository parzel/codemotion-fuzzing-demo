#!/bin/bash
clang++ -g -fsanitize=address,fuzzer fuzz.cc -o fuzz