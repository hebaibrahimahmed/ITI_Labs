#ifndef LINE_H
#define LINE_H
#include "point.h"
#include <math.h>
#include <iostream>

class Line
{
    point *p[2];

    public:

    Line (){

    for (int i =0 ; i<2 ; i++ )
    {

        p[i]=new point();
    }

        cout<<"please enter x";
        cin >>p[i]->x;
        cout<<"please enter y";
        cin >>p[i]->y;
        cout<<"please enter x";
        cin >>p[1]->x;
        cout<<"please enter x";
        cin >>p[1]->y;

    }


}

        int GetLength()
        {

            int powerx=pow(p[0]->x-p[1]->x,2);
            int powery=pow(p[0]->y-p[1]->y,2);
            int result=sqrt(powerx+powery);
            return result;

        }

    protected:

};

#endif // LINE_H
