#include <iostream>
#include "Rectangle.h"
#include "Shape.h"
#include "Circle.h"
#include "Square.h"
#include "Picture.h"
using namespace std;

int main()
{
    Rectangle R(5,5);
    int a=R.GetArea();
    cout<<"area for Rectangle = "<<a<<endl;
    R.Display();
    cout<<"============================ "<<endl;



    Circle C(5);
    int c=C.GetArea();
    cout<<"area for circle = "<<c<<endl;
    C.Display();
    cout<<"============================ "<<endl;





    Square S(3);
    int s=S.GetArea();
    cout<<"area for Square = "<<s<<endl;
    S.Display();
    cout<<"============================ "<<endl;





    Shape *arr[3];
    arr[0] = new Rectangle();
    arr[1] = new Circle() ;
    arr[2] = new Square;
    Picture p(arr);
    p.Display(3);



}
