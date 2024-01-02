using System;

public class MersenneTwister
{
    private const int N = 624;
    private const int M = 397;
    private const uint MATRIX_A = 0x9908b0df;
    private const uint UPPER_MASK = 0x80000000;
    private const uint LOWER_MASK = 0x7fffffff;

    private uint[] mt;
    private int mti;

    public MersenneTwister(uint seed)
    {
        mt = new uint[N];
        mt[0] = seed;
        for (mti = 1; mti < N; mti++)
        {
            mt[mti] = (uint)(1812433253 * (mt[mti - 1] ^ (mt[mti - 1] >> 30)) + mti);
        }
    }

    public uint NextUInt32()
    {
        if (mti >= N)
        {
            Twist();
        }

        uint y = mt[mti++];
        y ^= (y >> 11);
        y ^= (y << 7) & 0x9d2c5680;
        y ^= (y << 15) & 0xefc60000;
        y ^= (y >> 18);

        return y;
    }

    private void Twist()
    {
        for (int i = 0; i < N; i++)
        {
            uint y = (mt[i] & UPPER_MASK) | (mt[(i + 1) % N] & LOWER_MASK);
            mt[i] = mt[(i + M) % N] ^ (y >> 1) ^ ((y & 1) * MATRIX_A);
        }
        mti = 0;
    }
}