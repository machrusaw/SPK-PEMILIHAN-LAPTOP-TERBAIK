/** @format */

import React, { useEffect } from "react";
import useAlternatif from "../../store/alternatif";
import useKriteria from "../../store/kriteria";
import useNilai from "../../store/nilai";
import Normalisasi from "./Normalisasi";

const Perhitungan = () => {
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
      {/* The button to open modal */}
      <div className="flex justify-center">
        <article className="prose lg:prose-xl">
          <h3 className="text-center">Halaman Perhitungan</h3>
        </article>
      </div>
      <div className="mt-4">
        <Normalisasi
          dtAlternatif={dtAlternatif}
          dtKriteria={dtKriteria}
          dtNilai={dtNilai}
        />
      </div>
    </div>
  );
};

export default Perhitungan;
