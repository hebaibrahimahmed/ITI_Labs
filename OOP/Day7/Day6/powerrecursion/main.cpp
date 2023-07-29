#include <iostream>

using namespace std;
int pow(int a,int b){
    if (b!= 0)
     return (a*pow(a, b-1));
    else
        return 1;
}
int main()
{
    int x,y;
    printf("please enter first number \n");
    scanf("%d",&x);
    printf("please enter seconed number \n");
    scanf("%d",&y);
    int res = pow(x,y);
    printf("%d",res);
    return 0;
}
