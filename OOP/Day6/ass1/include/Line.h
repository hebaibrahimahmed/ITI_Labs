#ifndef LINE_H
#define LINE_H
#include "Point.h"
#include <math.h>
using namespace std;


class Line
{
    Point *point[2];
    public:
        Line()
        {
           for(int i=0;i<2;i++)
           {
               point[i] =new Point();
           }
            cout<<"Enter x :";
            cin>>point[0]->x;
            cout<<"Enter y :";
            cin>>point[0]->y;
            cout<<"Enter x :";
            cin>>point[1]->x;
            cout<<"Enter y :";
            cin>>point[1]->y;

        }
        int GetLength()
        {


            int powerx=pow(point[0]->x-point[1]->x,2);
            int powery=pow(point[0]->y-point[1]->y,2);
            int result=sqrt(powerx+powery);
            return result;


        }



    protected:

    private:
};

#endif // LINE_H
