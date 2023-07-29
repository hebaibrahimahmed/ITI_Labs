#include <iostream>

using namespace std;

int sum(int x=1, int y=1)
{
    int z= x+y;
    cout<<"the sum= "<<z;
}

int main()
{
    int x,y;
    cout<<"\t enter the two number to sum"<<endl;
    cin>>x>>y;

    sum(x,y);

    cout << " \t The cube of x is: " << cube(x) << "\n";

    return 0;}
