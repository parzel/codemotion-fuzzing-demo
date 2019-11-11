#include <stdint.h>
#include <stddef.h>
#include <string.h>


bool FuzzMe(const uint8_t *Data, size_t DataSize) {
  if (DataSize < 4) {
    return false;
  }
  char buffer[5];
  if(Data[0]== 'F'){
    if (Data[1] == 'U'){
      if(Data[2] == 'Z'){
        if (Data[3] == 'Z'){
          memcpy(buffer, Data, DataSize); //BUG HERE
        }
      }
    }
  }
  return true;
}

extern "C" int LLVMFuzzerTestOneInput(const uint8_t *Data, size_t Size) {
  FuzzMe(Data, Size);
  return 0;
}