/** @format */

import React, { useContext, useEffect, useState } from "react";
import Delete from "../../components/modal/Delete";
import Modal from "../../components/modal/Modal";
import TableComp from "../../components/table/TableComp";
import { ShowModalContext } from "../../context/ShowModalContext";
import usePembobotan from "../../store/pembobotan";
import Form from "./Form";

const Pembobotan = () => {
  // context
  const { showModal, setShowModal } = useContext(ShowModalContext);
  // store
  const { setPembobotan, dtPembobotan, addData, removeData } = usePembobotan();
  // state
  const [id, setId] = useState(false);
  const [dtEdit, setDtEdit] = useState(false);
  const [changeData, setChangeData] = useState(0);
  // get data
  useEffect(() => {
    setPembobotan({});

    return () => {};
  }, [changeData]);
  // show data edit
  const setEdit = (row) => {
    setDtEdit(row);
    setShowModal(true);
    console.log(row);
  };
  // show dialog delete
  const setDelete = (id) => {
    setId(id);
  };
  // aksi hapus
  const deletData = async (status) => {
    await removeData(id);
    setId(false);
  };
  const tambahData = () => {
    setShowModal(true);
    setDtEdit(false);
  };
  // table
  const headTable = ["No", "Kriteria", "Bobot", "Aksi"];
  const tableBodies = ["kriteria.nama", "bobot"];
  return (
    <div>
      <Delete id={id} setId={setId} deletData={deletData} />
      <Form
        showModal={showModal}
        setShowModal={setShowModal}
        dtEdit={dtEdit}
        setDtEdit={setDtEdit}
        changeData={changeData}
        setChangeData={setChangeData}
      />
      {/* The button to open modal */}
      <div className="flex flex-col-reverse items-center sm:flex-row-reverse sm:justify-between">
        <div className="w-fit">
          <label className="btn" onClick={tambahData}>
            Tambah Data
          </label>
        </div>
        <article className="prose lg:prose-xl">
          <h3 className="text-center">Halaman Pembobotan</h3>
        </article>
      </div>
      <div className="mt-4">
        <TableComp
          dataTable={dtPembobotan}
          headTable={headTable}
          tableBodies={tableBodies}
          setEdit={setEdit}
          setDelete={setDelete}
        />
      </div>
    </div>
  );
};

export default Pembobotan;
