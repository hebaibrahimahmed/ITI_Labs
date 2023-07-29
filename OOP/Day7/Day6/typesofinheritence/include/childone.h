#ifndef CHILDONE_H
#define CHILDONE_H
#include "parent.h"
#include "childtwo.h"
class childone : public childtwo
{
    public:
        childone() {}
        int x;
    protected:

    private:
};

#endif // CHILDONE_H
