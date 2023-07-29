#include <iostream>
#include "List.h"
using namespace std;

int main()
{
    cout << "please enter size of array" << endl;
    int size;
    cin >> size;
    List <int>l(size);
     l.add(1);
    l.add(2);
    l.add(3);
    l.add(4);
    l.add(5);
    l.add(6);
    try{
    int a = l.getlast();
    cout << "last index is "<<a << endl;
    }
    catch(const char *msg){
        cout << msg;
    }
    l.display();
    int ind;
    cout << "enter index to search" << endl;
    cin >> ind;
    try{
        int last = l.getbyindex(ind);;
        cout <<"item in index no "<<ind<<"is " << last << endl;
    }
    catch(const char *msg){
        cout << msg << endl;
    }
     int remind;
    cout << "enter index to remove" << endl;
    cin >> remind;
    try{
cout << "array after removing index no "<<remind << "is "<<endl;
        l.removeitem(remind);


    }
    catch(const char *msg){
        cout << msg << endl;
    }
    cout << "size before extend is "<<size;
    l.extend();
    cout << "size after extend is "<<size;
    return 0;
}
