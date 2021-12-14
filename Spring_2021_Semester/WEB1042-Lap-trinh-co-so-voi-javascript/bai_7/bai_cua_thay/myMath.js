var myMath = {};
myMath.soLonNhatTrongBaSo = function(a,b,c)
{
    a=Number(a);
    b=Number(b);
    c=Number(c);
    var max = a;
    if(max < b)
    {
        max = b;
    }
    if(max < c)
    {
        max = c;
    }
    return max;
}