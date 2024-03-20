/** @format */

import React, { useEffect, useState } from "react";
import { Toaster } from "react-hot-toast";
import TableNilai from "../../components/table/TableNilai";
import useAlternatif from "../../store/alternatif";
import useKriteria from "../../store/kriteria";
import useNilai from "../../store/nilai";

const Nilai = () => {
  // store
  const { setNilai, dtNilai } = useNilai();
  const { setAlternatif, dtAlternatif } = useAlternatif();
  const { setKriteria, dtKriteria } = useKriteria();
  // get data
  useEffect(() => {
    setNilai({});
    setAlternatif({});
    setKriteria({});
    return () => {};
  }, []);

  return (
    <div>
      <Toaster />
      {/* The button to open modal */}
      <div className="">
        <h3 className="text-center text-3xl font-bold">
          Halaman nilai kriteria masing-masing alternatif
        </h3>
        <p>Tekan enter untuk menyipan nilai</p>
      </div>
      <div className="mt-4">
        <TableNilai
          dtAlternatif={dtAlternatif}
          dtKriteria={dtKriteria}
          dtNilai={dtNilai}
        />
      </div>
    </div>
  );
};

export default Nilai;
