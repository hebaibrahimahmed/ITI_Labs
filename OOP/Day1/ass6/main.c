#include <stdio.h>
#include <stdlib.h>

  int scope= 40;


int main()
{
     int scope=10;
    cout << "Value of global x is " << ::scope;
    cout << "\n Value of local x is " << scope;

    return 0;
}
